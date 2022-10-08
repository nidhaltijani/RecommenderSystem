# -*- coding: utf-8 -*-
"""
Created on Fri May  6 11:48:52 2022

@author: nidha
"""

import nltk
from nltk.stem.snowball import FrenchStemmer
import mysql.connector
from nltk.corpus import stopwords
import numpy as np
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.feature_extraction.text import TfidfVectorizer
from scipy import spatial




connexion = mysql.connector.connect(
    host="localhost", user="root", password="", database="sysrec")
curseur = connexion.cursor()
print("connexion établie")

curseur.execute("select * from produit")
produits = curseur.fetchall()

curseur.execute("select count(*) from users")
nbusers=curseur.fetchall() #returns a tuple within a list
print(nbusers[0][0]) 
nbusers=nbusers[0][0]

curseur.execute("select count(*) from produit")
nbpdts=curseur.fetchall()[0][0]
print(nbpdts)
matriceNotes = np.zeros((nbusers,nbpdts))
print(matriceNotes)
def SimilariteCosine(a,b):
    return(1-spatial.distance.cosine(matriceNotes[a],matriceNotes[b]))

#recuperer les notes de la base de données
curseur.execute("select * from note")
notes=curseur.fetchall()
j=0 # pour iterer jusqu'au nb users
for note in notes :
    for i in range(10):
        #il faut sauter la colonne de l'id 
        matriceNotes[j][i]=note[i+1] # ca veut dire pour le user d'id j  on affecte les notes en sautant lid
    #next user
    j+=1
print("voici notre matrice binaire contenant les notes importées de la DB")
print(matriceNotes)

#matrice similarite entre users
matriceSimilarite = np.zeros((nbusers,nbusers))
for i in range(nbusers) : 
    for j in range(nbusers):
        matriceSimilarite[i][j]= SimilariteCosine(i, j)
print(matriceSimilarite)
#fct de prediction de notes
def notePredite(matrice,iduser,idPdt,top1,top2,top3,max1,max2,max3):
    return ((max1*matrice[top1][idPdt])+(max2*matrice[top2][idPdt])+(max3*matrice[top3][idPdt]))/(max1+max2+max3)
newMatriceNotes=np.zeros((nbusers,nbpdts))
#on va calculer top 3 users similaires a chacun de nos users et on l'insere dans la BD
for i in range(nbusers):
    top1=-1
    top2=-1
    top3=-1
    max1=-1
    max2=-1
    max3=-1
    
    for j in range(nbusers):
        if (j!=i): # pour vérifier quil sagit pas du meme user
            similarite=matriceSimilarite[i][j]
            if(similarite>max1):
                max1=similarite
                top1=j+1 # top 1 doit etre lid qu'on va inserer et la matrice commence par lidnice 0
    for k in range(nbusers): 
        if (k!=i): # pour vérifier quil sagit pas du meme user
            similarite=matriceSimilarite[i][k]
            if(similarite>max2) and (similarite <max1): #verifier que cette valeur est la 2 eme max
                max2=similarite
                top2=k+1
    for l in range (nbusers):
        if (l!=i): # pour vérifier quil sagit pas du meme user
            similarite=matriceSimilarite[i][l]
            if(similarite>max3) and (similarite<max2): # on a vérifié avec max2 seulement car elle meeme est inf a max 1
                max3=similarite
                top3=l+1
    print("les users les plus similaires à cet user  sont ",top1,",",top2,",",top3)
    sql="update users set top1=%s,top2=%s,top3=%s where idUser=%s"
    val=(top1,top2,top3,i+1)
    curseur.execute(sql,val)
    connexion.commit()
    #ici note predite
    ligne=[]
    for z in range(len(matriceNotes[i])):
        
        if(matriceNotes[i][z]!=0):
            #mettre les notes reelles à 0 dans la matrice de prediction
            newMatriceNotes[i][z]=0
            ligne.append(0)
        else: #top1-1 parceque lid commence de 1 et matrice de 0
            newMatriceNotes[i][z]=round(notePredite(matriceNotes,i-1,z,top1-1,top2-1,top3-1,max1,max2,max3),2)
            ligne.append(float(notePredite(matriceNotes,i-1,z,top1-1,top2-1,top3-1,max1,max2,max3)))
        #on doit changer les colonnes de la base de données  en float pour pouvoir inserer
    """sql="update noteprediction set pdt1=%s,pdt2=%s,pdt3=%s,pdt4=%s,pdt5=%s,pdt6=%s,pdt7=%s,pdt8=%s,pdt9=%s,pdt10=%s "
    vals=(ligne[0],ligne[1],ligne[2],ligne[3],ligne[4],ligne[5],ligne[6],ligne[7],ligne[8],ligne[9])
    curseur.execute(sql,vals)
    connexion.commit()"""
print("lancienne matrice notes")
print(matriceNotes)
print("la nouvelle matrice contenant les notes prédites")
print(newMatriceNotes)
#sql="update noteprediction set pdt1=%s,pdt2=%s,pdt3=%s,pdt4=%s,pdt5=%s,pdt6=%s,pdt7=%s,pdt8=%s,pdt9=%s,pdt10=%s where idUser=%s"
#cur.executemany("INSERT INTO LIVRES(titre,auteur,ann_publi,note) VALUES(?, ?, ?, ?)", datas)
#curseur.execute("INSERT INTO noteprediction(pdt1,pdt2,pdt3,pdt4,pdt5,pdt6,pdt7,pdt8,pdt9,pdt10 VALUES(?,?,?,?,?,?,?,?,?,?)",newMatriceNotes)
#connexion.commit()
"""for i in range(nbusers):
    curseur.executemany("update noteprediction set pdt1=%s, pdt2=%s, pdt3=%s, pdt4=%s, pdt5=%s, pdt6=%s, pdt7=%s, pdt8=%s, pdt9=%s, pdt10=%s where idUser=%S",(newMatriceNotes[i],i+1))
    connexion.commit()"""
"""
for i in range(nbusers):
    l=[]
    l.extend(newMatriceNotes[i])
    l.append(i+1) #id user
    t=tuple(l)
    curseur.execute("update noteprediction set pdt1=%s,pdt2=%s,pdt3=%s,pdt4=%s,pdt5=%s,pdt6=%s,pdt7=%s,pdt8=%s,pdt9=%s,pdt10=%s where idUser=%S",t)
    connexion.commit()
curseur.execute("update noteprediction set pdt1=%s,pdt2=%s,pdt3=%s,pdt4=%s,pdt5=%s,pdt6=%s,pdt7=%s,pdt8=%s,pdt9=%s,pdt10=%s where idUser=1",tuple(newMatriceNotes[0]))
connexion.commit()"""
#on va recommender le meilleur produit
def recommendations(matrice,idUser):
    maxim=0
    prod_recomm=0
    for k in range(len(matrice[idUser-1])):
        if(matrice[idUser-1][k]>maxim):
            maxim=matrice[idUser-1][k]
            prod_recomm=k+1 # id du prod recommendé
    return prod_recomm
print(recommendations(newMatriceNotes,4))
        
            
    
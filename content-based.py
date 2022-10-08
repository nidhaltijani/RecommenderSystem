# -*- coding: utf-8 -*-
"""
Created on Wed Apr 13 15:29:39 2022

@author: nidha
"""
import nltk
from nltk.stem.snowball import FrenchStemmer
import mysql.connector
from nltk.corpus import stopwords
import numpy as np
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity
import math

matriceBinaire = np.zeros((0, 0))
connexion = mysql.connector.connect(
    host="localhost", user="root", password="", database="sysrec")
curseur = connexion.cursor()
print("connexion établie")

curseur.execute("select * from produit")
produits = curseur.fetchall()

StopList = list(stopwords.words('french'))
StopList.extend([".", ",", ":", "/", "!", ":", "-", "(", ")", "''"])
dictProduits = {}
ListTotaliteMots = set()









print("la liste des produits :")
print(produits)
print("\n\n fin de la liste des produits \n\n")
for p in produits:
    idPdt = int(p[0])
    Description = p[2]
    print("############ idpt ############")
    Mots = nltk.word_tokenize(Description)
    print("les mots de la description ")
    print(Mots)
    print("\n\n\n fin des mots \n\n")
    stemer = FrenchStemmer()
    MotsStems = []
    for m in Mots:
        MotsStems.append(stemer.stem(m))
    print("\n\n nouvelle liste des mots apres stemmer\n\n")
    print(MotsStems)
    print("\n\n\nfin stemmer \n\n\n")
    ListFinalMots = []
    
    for m in MotsStems:
        if m not in StopList:
            ListFinalMots.append(m)
    
    #print(dictfinalmots)
    
    print("\n\nvoici la liste final des mots \n\n")
    print(ListFinalMots)
    print("\n\nfin de la liste final\n\n")
    for m in ListFinalMots:
        ListTotaliteMots.add(m)
        
    dictProduits[idPdt] = ListFinalMots
    #il faut ajouter un dict contenant les valeurs de tfidf ici 
    
    print("\n\n voici le dict final \n\n")
    print(dictProduits)
    print("\n\n fin de laffichage du dict\n\n")

#implémentation du tfidf
def tf(wordDict, liste):
    tfDict = {}
    listecount = len(liste)
    for word, count in wordDict.items():
        tfDict[word] = count/float(listecount)
    return tfDict

def idf(listeprods):
    import math
    idfDict = {}
    N = len(listeprods)
    
    idfDict = dict.fromkeys(listeprods[0].keys(), 0)
    for prod in listeprods:
        for word, val in prod.items():
            if val > 0:
                idfDict[word] += 1
    
    for word, val in idfDict.items():
        idfDict[word] = math.log10(N / float(val))
        
    return idfDict  


def tfidf(tfDict, idfs):
    tfidf = {}
    for word, val in tfDict.items():
        tfidf[word] = val*idfs[word]
    return tfidf


#un dict pour stocker les ids des prods comme key et val un dict contenant les mots et leurs valeurs
dictionnairefinal={}
idprod=1
#liste pour stocker tt les dict de tt les prods pour faire le idf
listeDictIDF=list()
for p in produits:
    dictfinalmots={}
    dictfinalmots=dict.fromkeys(ListTotaliteMots, 0) 
    for mot in dictProduits[idprod]:
        dictfinalmots[mot]+=1
    
    dictionnairefinal[idprod]=tf(dictfinalmots,dictProduits[idprod])
    idprod+=1
    listeDictIDF.append(dictfinalmots)

print("voici dict apres tf\n\n\n\n\n")
print(dictionnairefinal)

#calcul du idf de tous les prods
idfs=idf(listeDictIDF)
#update dict final avec tfidf values
for key,value in dictionnairefinal.items():
    dictionnairefinal[key]=tfidf(value,idfs)

#affichage du dict apres tfidf

print("voici le dict final\n\n\n\n")
print(dictionnairefinal)
nbMots = int(len(ListTotaliteMots))
nbPdts = len(dictProduits)


MatriceBinaire = np.zeros((nbPdts, nbMots))
for i in range(nbPdts):
    j=0
    for m in ListTotaliteMots:
        if m in dictProduits[(i+1)]:
            MatriceBinaire[i][j]=1
        j+=1
print("voici liste total des mots")
print(ListTotaliteMots)
print("\n\n voici notre matrice binaire normal\n\n") 
print(MatriceBinaire)
#amélioration de la matrice à l'aide du TFIDF
MatriceBinaireTFIDF=np.zeros((nbPdts, nbMots))
for i in range(nbPdts):
    j=0
    for m in ListTotaliteMots:
        if m in dictProduits[(i+1)]:
            #affecter les valeurs du tfidf à une matrice
            MatriceBinaireTFIDF[i][j]=dictionnairefinal[i+1][m]
        j+=1


print("voici la matrice du tfidf\n\n\n")
print(MatriceBinaireTFIDF)
csTFIDF=cosine_similarity(MatriceBinaireTFIDF)
def similarProductTFIDF(id_prod):
    scores=list()
    for i in range(nbPdts):
        if (i+1)!=id_prod:
            element=((i+1),csTFIDF[i][id_prod-1])
            scores.append(element)
    #print(scores)
    sorted_scores=sorted(scores, key=lambda x:x[1],reverse=True)
    #print(sorted_scores)
    #count  akreb 3 items ll item selected 
    #j=0
    similar_product_ids=list()
    similar_product_ids.append(sorted_scores[0][0])
    similar_product_ids.append(sorted_scores[1][0])
    similar_product_ids.append(sorted_scores[2][0])
    return similar_product_ids
print(similarProductTFIDF(1))
def insertDbTopNTFIDF():
    for i in range(nbPdts):
        idp=i+1
        resultat=similarProductTFIDF(i+1)
        sql="update produit set top1=%s,top2=%s,top3=%s where idPdt=%s"
        val=(resultat[0],resultat[1],resultat[2],idp)
        curseur.execute(sql,val)
        connexion.commit()
insertDbTopNTFIDF()
#!/usr/bin/env python3

import mysql.connector as mysql
import pandas as pd
from sklearn.cluster import KMeans
import sys

db=mysql.connect(host="localhost", user="akash", passwd="akash11", database="brokfree")

cursor=db.cursor()
cursor.execute("SELECT * FROM activity")

result=cursor.fetchall()
db.close()

df=pd.DataFrame(result, columns=['ID','Username','Day 1','Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7', 'Day 8', 'Day 9', 'Day 10'])

list1=df['ID'].tolist()
list2=df['Username'].tolist()

df=df.drop('Username',1)
df=df.drop('ID',1)

#Performing K Means Clustering
kmeans=KMeans(n_clusters=2, init='random', random_state=1)
kmeans.fit(df)

df['ID']=list1
df['Username']=list2
df['Cluster']=kmeans.labels_

#name=sys.argv[1]
name='Akash Menon'
if(name in df.values):
    a=df.loc[df.Username==name]
    value=a['Cluster'].values
    if(value==0):
        print('Broker')
    elif(value==1):
        print("Normal user!")
else:
    print("User doesn't exist!")

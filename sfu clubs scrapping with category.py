#!/usr/bin/env python
# coding: utf-8

# # https://go.sfss.ca/clubs/list

# In[40]:


import pandas as pd
import numpy as np
import requests
from bs4 import BeautifulSoup

#get all content
all_html = requests.get("https://go.sfss.ca/clubs/list")
#print all content
#print(all_html.text[0:500])


# In[41]:


soup1 = BeautifulSoup(all_html.text, 'html.parser')
print(soup1)


# In[42]:


#get each club info -> array
soup2 = soup1.find_all("tr")

club=[]
for oneclub in soup2:
    for logo in oneclub.find_all('img'):
        logo_src ="https://go.sfss.ca"+logo['src']
        #club.append(logo_src)
    for club_info in oneclub.find_all('a'):
        club_sfss_link ="https://go.sfss.ca"+club_info['href']
        #club.append(club_sfss_link)
        if club_info.text!="":
            club_name=club_info.text
            #club.append(club_name)
    for i in oneclub.find('br').next_siblings:
        club_description = i.strip()
        #club.append(club_description)
    club.append([logo_src,club_sfss_link,club_name, club_description])
    
data=pd.DataFrame(club, columns=['logo','link','club_name','description'])


# In[43]:


club_cat=[]
#extract categories
#get all content
for i in range(1,13):
    cat_html = requests.get("https://go.sfss.ca/clubs/list.php?ClubTypeID="+str(i))
    #print all content
    #print(cat_html.text)
    
    soup1v = BeautifulSoup(cat_html.text, 'html.parser')
    soup2v = soup1v.find_all("tr")
    
    for oneclubv in soup2v:
        for club_infov in oneclubv.find_all('a'):
            if club_infov.text!="":                
                club_namev=club_infov.text
                #club.append(club_name)
                club_cat.append([club_namev,i])

data2=pd.DataFrame(club_cat, columns=['club_name','categoryID'])
print(data2)


# In[44]:


#join dataframe containing categoryID
data =data.join(data2.set_index('club_name'), on='club_name')


# In[45]:


print(data)
data.to_csv(r'club-list.csv', index=False)


# In[ ]:





# In[ ]:





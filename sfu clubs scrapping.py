#!/usr/bin/env python
# coding: utf-8

# # https://go.sfss.ca/clubs/list

# In[4]:


import pandas as pd
import numpy as np
import requests
from bs4 import BeautifulSoup

#get all content
all_html = requests.get("https://go.sfss.ca/clubs/list")

#print(all_html.text[0:500])

soup1 = BeautifulSoup(all_html.text, 'html.parser')
print(soup1)


#get each club info -> array
soup2 = soup1.find_all("tr")

club=[]
for oneclub in soup2:
    for logo in oneclub.find_all('img'):
        logo_src ="https://go.sfss.ca"+logo['src']
    for club_info in oneclub.find_all('a'):
        club_sfss_link ="https://go.sfss.ca"+club_info['href']
        if club_info.text!="":
            club_name=club_info.text
    for i in oneclub.find('br').next_siblings:
        club_description = i.strip()
    club.append([logo_src,club_sfss_link,club_name, club_description])

data=pd.DataFrame(club, columns=['logo','link','info','description'])
print(data)
data.to_csv(r'club-list.csv', index=False)

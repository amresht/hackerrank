import urllib
import httplib2
import time


from xml.dom import minidom

import json


username  = "<USERNAME>"
password ="<SSOPWD>"

base_url  = 'http://mysplunk.api.localhost:8089'

# Create an http object and disable ssl validation
myhttp  = httplib2.Http(disable_ssl_certificate_validation=True)


#STEP GET SESSION KEY

server_content = myhttp.request(base_url+ "/services/auth/login", POST, headers ="{}",
    body = urllib.parse.urlencode({"username": username, "passcode":passcode}))[1]

session_key = minidom.parseString(server_content).getElementsByTagName('SessionKey').childNodes[0].nodeValue
print("#####SESSION-KEY %s ######", session_key)

#PREP THE SEARCH QUERY
search_query = 'index="index_name"  | head 10'

search_job = myhttp.request (base_url)
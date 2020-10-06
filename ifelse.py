#!/home/amresh/anaconda3/bin/python

import math
import os
import random
import re
import sys



print("Enter Number:", end="")
n = int(input().strip())
    
print("n is ",n )
# If  is odd, print Weird
if(n%2 != 0):
    print("Weird")
# If  is even and in the inclusive range of  to , print Not Weird
elif( (n >=2 and n<=5) and n%2==0 ):
    print("Not Weird")
# If n is even and in the inclusive range of  6 o 20, print Weird
elif(n%2==0 and (n >=6 and n<=20) ):
    print("Weird")
# If n is even and greater than 20, print Not Weird
elif( n>=20 and n%2==0):
    print("Not Weird")

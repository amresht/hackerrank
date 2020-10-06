# Enter your code here. Read input from STDIN. Print output to STDOUT
from collections import Counter

#X= TOTAL NUMBER OF SHOES
X = int(input())

# Get the total unique sizes of shoes
line = input().split()
ctr = Counter(line)
print(ctr)
# Read the number of customers
N = int(input())

#Now read the  customer size , price let us call it demand

#save the earnings
earnings =0

for _ in range(N):
    size, price = input().split(" ")
    
    # check if the size is available
    if (ctr[size] > 0):
        #print(ctr[size])
        # now calculate the price paid 
        earnings+= int(price)
        ctr[size] -= 1

print(earnings)


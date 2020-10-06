# Enter your code here. Read input from STDIN. Print output to STDOUT
n, m = map(int,input().split())

pattern=""

for i in range(n//2):
    pattern += (".|." *(2*i+1)).center(m,'-')
    pattern = pattern+"\n"
    #print (pattern)

pattern+=  ("WELCOME".center(m,'-')) + "\n"

for i in range(n//2,0,-1):
    pattern += (".|." *(2*i-1)).center(m,'-')
    pattern = pattern+"\n"
    
print(pattern)




#e-d-c-b-a-b-c-d-e

import string
alpha = string.ascii_lowercase

def print_rangoli(size):
    # your code goes here
    #e-d-c-b-a-b-c-d-e
    alpha = string.ascii_lowercase
    pattern =""
    
    for i in range(1, size+1):
        pattern1 =""

        for j in range(i):
            pattern1 += alpha[size-j-1] + "-" 
        
        for k in range(1,i):
            pattern1 += alpha[size-j-1+k] + "-"
            
        # remove trailing -
        pattern1 = pattern1[:-1]
        # pad with - 
        pattern +=pattern1.center(4*size-3,"-") +"\n"

    for i in range(1, size):
        pattern1 =""
        
        for j in range(size, i, -1):
            pattern1 += alpha[j-1] + "-" 
        
        for k in range(size - i-1, 0, -1):
            pattern1 += alpha[size-k] + "-" 

        
        pattern +=pattern1.center(4*size-3,"-") +"\n"
    print(pattern)

    return

#e-d-c-b-a-b-c-d-e

if __name__ == '__main__':
    n = int(input())
    #n=5
    print_rangoli(n)
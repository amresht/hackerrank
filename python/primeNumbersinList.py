import math
# Function that checks whether a number is prime or not
def is_prime(x):
    # Corner case
    if (n <= 1):
        return False
    # we will check only till the square root of the number
    sqrtx = int(math.sqrt(x))
    
    for  i in range(2,sqrtx + 1):
        #Since we found a multiple other than 1,itself it is not prime
        if x % i == 0 :
            return False
    return True

#Code execution starts here 
if __name__=='__main__': 
    
#Let us define a list for simplicity
number_list = [2,51, 5, 10, 18,13, 20, 14, 5 , 7 ,9] 

#For each number in the list    
for i in range(len(number_list)):
    #Check if it is a prime number
    if(is_prime(number_list[i])):
        #it is a prime so we print it
       print(number_list[i]) 



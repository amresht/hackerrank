import math
# Function that checks whether a number is prime or not
def is_prime(x):
    # Corner case
    if (n <= 1):
        return False
    # we will check only till the square root of the number
    sqrtx = int(math.sqrt(x))
    
    for  i in range(2,sqrtx + 1):
        if x % i == 0 :
            return False
    return True

#Code execution starts here 
if __name__=='__main__': 
    
number_list = [2,51, 5, 10, 18,13, 20, 14, 5 , 7 ,9] 
    
for i in range(len(number_list)):
    if(is_prime(number_list[i])):
       print(number_list[i]) 



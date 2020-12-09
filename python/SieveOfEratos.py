# Python program to print all primes smaller than or equal to 
# n using Sieve of Eratosthenes 
  
def SieveOfEratosthenes(n): 
      
    # Create a boolean array "prime[0..n]" and initialize 
    #  all entries it as true. 
    prime = [True for i in range(n+1)] 
    p = 2
    #now we will check from p^2 to N 
    while (p * p <= n): 
          
        # If the current number[p] has not been checked 
        if (prime[p] == True): 
              
            # Update all multiples of p 
            for i in range(p * p, n+1, p): 
                # we found a non-prime
                prime[i] = False
        p += 1
      
    # Print all prime numbers 
    for p in range(2, n+1): 
        if prime[p]: 
            print (p)
  
# driver program 
if __name__=='__main__': 
    n = 30
    print ("Following are the prime numbers smaller" )
    print ("than or equal to", n )
    SieveOfEratosthenes(n) 
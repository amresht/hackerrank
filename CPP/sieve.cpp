/* 
 * File:   sieve.cpp
 * Author: amresh tripathi
 *
 * Created on December 8, 2020, 8:10 PM
 */

#include <iostream>
#include <limits.h>
using namespace std;
using namespace std;
/*
 A C++ Program to implement Sieve of Eratosthenes
 */
void sieve (int n)
{
    vector <bool> isPrime(n+1, true);
    for(int i=2; i <= n ; i++){
        if( isPrime[i]) {
            cout << i<<;
            for (int j = i*i; j <=n ; j=j+i) {
                isPrime[j] = false;
            }
        }
    }
}

/*
 * 
 */
int main() {
    	int n = 18;
	sieve(n);
}


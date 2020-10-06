#!/home/amresh/anaconda3/bin/python

def is_leap(year):
    leap = False
    
    if (year < 1900 or year > 100000 ): 
        leap = False

    # Write your logic here
    if ((year%4==0 and year%100!=0) or year%400==0  ):
        leap = True
    elif(year%100==0 and year%400!=0):
        leap= False
    else:
        leap = False
    return leap

print("Enter year: ", end='')
year = int(input())

print (str(is_leap(year)))
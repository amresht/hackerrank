#!/home/amresh/anaconda3/bin/python


print("Enter #: ", end='')
n = int(input())


if (n >=1 and n<= 150):
    x= range(n)
    for i in x:
        print(i+1, end='')
else:
    print("Error")
    
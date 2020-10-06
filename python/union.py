#!/home/amresh/anaconda3/bin/python


# print("Enter a#: ", end='')
# numa = int(input())
print("Enter a: ", end='')
a = set(input().split())
a = a.difference(" ")

print (a)

# print("Enter b#: ", end='')
# numb = int(input())

print("Enter b: ", end='')
b = set(input().split())
b = b.difference(" ")
print (b)

c = a.union(b)

print (c)
print(len(c))


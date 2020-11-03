#!/bin/python3
#HACKER RANK PROBLEM Insert a node at a specific position in a linked list
#author : amresht
#
#https://www.hackerrank.com/challenges/insert-a-node-at-a-specific-position-in-a-linked-list/problem

import math
import os
import random
import re
import sys

class SinglyLinkedListNode:
    def __init__(self, node_data):
        self.data = node_data
        self.next = None

class SinglyLinkedList:
    def __init__(self):
        self.head = None
        self.tail = None

    def insert_node(self, node_data):
        node = SinglyLinkedListNode(node_data)

        if not self.head:
            self.head = node
        else:
            self.tail.next = node


        self.tail = node

def print_singly_linked_list(node, sep, fptr):
    while node:
        fptr.write(str(node.data))

        node = node.next

        if node:
            fptr.write(sep)

# Complete the insertNodeAtPosition function below.

#
# For your reference:
#
# SinglyLinkedListNode:
#     int data
#     SinglyLinkedListNode next
#
#
def insertNodeAtPosition(head, data, position):
    # create a new node with data
    newnode = SinglyLinkedListNode(data)
    
    if head is None or (position ==0):
            return new_node
    # set current node as the head of linked list
    current =  head 
    #loop till the position number is found
    for _ in range(position-1):
        current= current.next
    # now we are at the position 
    #now new node points to current node's next
    newnode.next = current.next
    #then current node's next is new node now 
    current.next = newnode
    
    return head

if __name__ == '__main__':
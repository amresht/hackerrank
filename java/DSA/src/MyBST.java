/*
 * @Desc		Binary Search Tree : Insert , Search, Delete  : recursive operations
 * @author		Amresh Tripathi
 * @date		19-Jan-2023

 * */

import java.util.*;
import java.io.*;
import java.lang.*;


public class MyBST {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Node root = new Node(10);
		
		root.left = new Node(5);
		root.right = new Node(15);
		root.right.left = new Node(12);
		root.right.right = new Node(18);
		
    	int x=20;
    	
    	root=insert(root,x);
    	inOrderTraversal(root);		

	}

	
	
	public static Node insert(Node root, int x) {
		// if the tree is null
		if (root == null) {
			// create a new node and return as root
			return new Node(x);
		}
		
		// if the key being inserted is greater than root node's key insert on right subtree 
		if(root.key < x) {
			root.right = insert(root.right, x);
		}
		else if (root.key >= x) {
			//if the key being inserted is lesser than root node's key insert on left subtree			
			root.left = insert(root.left, x);
		}
		return root;
	}
	
	public static void inOrderTraversal(Node root) {
		// if root is not null 
		if (root != null) {
			inOrderTraversal(root.left);
			System.out.print(root.key + " " );
			inOrderTraversal(root.right);
		}
		return;
	}	
	
}

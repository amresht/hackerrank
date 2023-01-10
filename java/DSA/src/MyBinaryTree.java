/*
 * Implement a DFS tree traversal in Binary tree
 * In, Pre, Post order
 * @author			Amresh Tripathi
 * @version			1.0
 * @date			10-JAN-2023
 * */


class Node {
	int key;
	Node left, right;
	
	public Node() {
		key = -1;
		left=right=null;
	}
	
	public Node(int item) {
		key = item;
		left=right=null;
	}
}

public class MyBinaryTree {
	// each binary tree has a root node at the very least
	Node root;

	public MyBinaryTree(int nodeValue) {
		// create root node if a value is passed
		root = new Node(nodeValue);
		
	}
	
	public MyBinaryTree() {
		// A null tree with empty root node
		root = null;
		
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
	
	public static void preOrderTraversal(Node root) {
		// if root is not null 
		if (root != null) {
			System.out.print(root.key + " " );
			preOrderTraversal(root.left);
			preOrderTraversal(root.right);
		}
		return;		
	}

	public static void postOrderTraversal(Node root) {
		// if root is not null 
		if (root != null) {
			postOrderTraversal(root.left);
			postOrderTraversal(root.right);
			System.out.print(root.key + " " );
		}
		return;		
	}	
	
	
	public static void main(String[] args) {
		MyBinaryTree tree = new MyBinaryTree();
		//														 [ ROOT ]
		tree.root = new Node(1);					//				1
		tree.root.left = new Node(2);				//		     /	  \
		tree.root.right = new Node(3);				//			2		3
		tree.root.right.left = new Node(4);			//		  		  /	  \
		tree.root.right.right = new Node(5);		//				4		5
		
		System.out.print("\ninOrderTraversal ");
		inOrderTraversal(tree.root);
		System.out.print("\npreOrderTraversal ");
		preOrderTraversal(tree.root);
		System.out.print("\npostOrderTraversal ");
		postOrderTraversal(tree.root);		
	}

}

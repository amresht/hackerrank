/*
 * @Desc		Node class for Trees
 * @author		Amresh Tripathi
 * @date		19-Jan-2023

 * */

public class Node {
	int key;
	Node left, right;
	
	Node () {
		key=0;
		left = right = null;
	}
	// constructor for class node
	Node (int k) {
		key=k;
		left = right = null;
	}
}

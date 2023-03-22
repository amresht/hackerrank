/**
 * @class          Insertion Sort Driver Class 
 * @author          Amresh Tripathi 
 * @date            22-Mar-2023
 * @version         1.0
 */
package app;

import lib.InsertionSort;

public class InsertionSortDriver {

	public InsertionSortDriver() {
		// TODO Auto-generated constructor stub
	}

	public static void main(String[] args) {
		InsertionSort ins = new InsertionSort();
		
		int arr[]  = {32, 41, 54, 73, 11, 19, 9, 22, 16, 88};
		int len  = arr.length;
		
	    ins.insertionSort(arr);
		for (int i=0; i< len; i++) 
			System.out.println(arr[i]);
		
	}
	
}

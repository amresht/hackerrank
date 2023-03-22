/**
 * @class          Insertion Sort Driver Class 
 * @author          Amresh Tripathi 
 * @date            22-Mar-2023
 * @version         1.0
 */
package lib;

public class InsertionSort {
	public InsertionSort() {}

	
	public void insertionSort(int arr[] ) {
		int n  =arr.length ;
		for (int i=1; i <n; i++) {
			int key = arr[i];
			int j = i-1;
			// if the current key is lesser than array[j]
			while (j >=0 &&  arr[j]  > key ) {
				//push to make space for the key ahead
				arr[j+1] = arr[j];
				j--;
			}
			arr[j+1] = key;
		}
	}

	public void insertionSort(int arr[], int n) {

		for (int i=1; i <n; i++) {
			int key = arr[i];
			int j = i-1;
			// if the current key is lesser than array[j]
			while (j >=0 &&  arr[j]  > key ) {
				//push to make space for the key ahead
				arr[j+1] = arr[j];
				j--;
			}
			arr[j+1] = key;
		}
	}

}

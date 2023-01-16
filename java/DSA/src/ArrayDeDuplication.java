/*
 * @desc		De-duplicate an array using hashmap.  a sorted array using efficient method removeDuplicates
 * 				A HashMap retains a unique unordered key value pairs of items 
 * @author		Amresh Tripathi
 * @date		16-Jan-2023
 * */

import java.util.HashSet;
import java.util.Iterator;

public class ArrayDeDuplication {

	public ArrayDeDuplication() {
		// TODO Auto-generated constructor stub
	}
	
	public static int removeDuplicates (int arr[]) {
		int res =1;
		
		for(int i=0; i< aWDWD48875rr.length; i++) {
			if (arr[i] != arr[res-1] ) {
				arr[res] = arr[i];
				res++;
			}
		}
		return res;
	}

	public static void main(String[] args) {
		int arr[] = {3, 2, 11, 34, 98, 13, 10, 3, 2, 2, 34, 11, 2, 98, 11, 34, 3, 11, 34};
		// TODO Auto-generated method stub
		HashSet<Integer> hashint = new HashSet<Integer>();
		// let us find the length of the array.
		int i, j=0;
		
		int lengthArray = arr.length;
		
		for(i=0; i< lengthArray; i++) {
			hashint.add(arr[i]);
			arr[i]= -1;
		}
		
		Iterator<Integer> it = hashint.iterator();
		
		while(it.hasNext()) {
			//System.out.print(i.next() + ", ");
			arr[j] = it.next();
			//System.out.println( arr[j]);
			j++;
		}

		for(i=0; i< lengthArray; i++) {
			System.out.println( arr[i]);
		}
		
		int arrSorted[] = {1,1,1,2,3,3,4,4,5,6,6,6,6,7};
		
		int max = removeDuplicates(arrSorted);
		for(i=0; i< max ; i++) {
			System.out.print(arrSorted[i] + ", ");
		}
		

	}

}

/*
 * @desc		Implement Hashmap and its operations
 * 				A HashMap retains a unique unordered key value pairs of items 
 * @author		Amresh Tripathi
 * @date		12-Jan-2023
 * */
import java.util.*;

public class MyHashMap {

	public MyHashMap() {
		// TODO Auto-generated constructor stub
	}

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		HashMap<String, Integer> hmapbro = new HashMap<>();
		
		hmapbro.put("Chair", 11);
		hmapbro.put("Table" , 12);
		hmapbro.put("Bench" , 13);
		// Print all of the hashmap
		System.out.println(hmapbro);
		// Print the hashmap's size
		System.out.println("Size: " + hmapbro.size());
		
		hmapbro.put("Pillow" , 13);
		
		//	loop through a hashmap
		for(Map.Entry<String,Integer> e: hmapbro.entrySet()) {
			System.out.println(e.getKey() + " => " + e.getValue());
		}
		
		// check if a key exists in hashmap 
		System.out.println("Contains Key Table: " + hmapbro.containsKey("Table"));
		System.out.println("Contains Key Pow  : " + hmapbro.containsKey("Pow"));
		// Check for value
		System.out.println("Contains Value 11 : " + hmapbro.containsValue(11));

		// we change the value for key Chair
		hmapbro.put("Chair", 19);
		// PRINT Size
		System.out.println("Size : " + hmapbro.size());
		System.out.println(hmapbro);
	}

}

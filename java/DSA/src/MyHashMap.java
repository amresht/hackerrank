/*
 * @desc		Implement Hashmap and its operations 
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
		
		System.out.println(hmapbro);
		
		System.out.println("Size: " + hmapbro.size());
		
		hmapbro.put("Pillow" , 13);
		
		//	loop through a hashmap
		for(Map.Entry<String,Integer> e: hmapbro.entrySet()) {
			System.out.println(e.getKey() + " => " + e.getValue());
		}
		

	}

}

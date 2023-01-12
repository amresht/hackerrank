/*
 * @desc		This implements a hashset and its various operations, add remove, size, and looping over it.
 * 				hashset retains a unique unordered list of items(Vegetable names here. Go Vegan!!!) 
 * @author		Amresh Tripathi
 * @date		12-Jan-2023
 * */
import java.util.*;

public class MyHashSet {

	public static void main(String[] args) {
		// Let us declare a hashset with type String 
		HashSet<String> hashveg = new HashSet<String>();
		
		hashveg.add("Carrots");
		hashveg.add("Turnips");
		hashveg.add("Radishes");
		hashveg.add("Onions");
		
		System.out.println(hashveg);
		
		System.out.println("Has Peas : "+ hashveg.contains("Peas"));
		System.out.println("Has Peas : "+ hashveg.contains("Onions"));
		System.out.println("isEmpty : "+ hashveg.isEmpty());
		System.out.println("Hash' Size : "+ hashveg.size());
		// REMOVE radishes
		hashveg.remove("Radishes");

		Iterator<String> i = hashveg.iterator();
		System.out.print("Iterator =>");
		while(i.hasNext()) {
			System.out.print(i.next() + ", ");
		}
	}
}

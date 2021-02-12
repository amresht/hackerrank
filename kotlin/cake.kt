fun main() {
    // variable declaration
    val name ="Vasu"
    val age = 8
    val layers = age/5 +2

    printBorder("'-._.-'", layers);
    println(" Happy Birthday, ${name}")
	printBorder("'-._.-'", layers);
    printCandles(age)
    printCakeFrosting(age)
    printCakeLayers(age,layers)
}


fun printCandles(age: Int) {
    print(" ")
    repeat(age){
        print(",")
    }
    println()
    print(" ")
    repeat(age){
        print("|")
    }
}
fun printCakeFrosting(age: Int){
    println("")
    repeat(age+2){
        print("=")
    }
}
fun printCakeLayers(age: Int, layers: Int){
    println("")
    repeat(layers) {
        repeat(age+2){
            print("@")
        }
        println("")
    }    
}
fun printBorder(pattern: String, num: Int){
    repeat(num) {
    	print(pattern)
    }
    println("")
}
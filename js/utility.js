function getSecondLargest(nums) { 
    // Complete the function 
    let first = nums[0];        //initialize the largest as first number
    let second = -1;            // let the second largest be any low value
    // for each element in the array
    for (let i = 0; i < nums.length; i++) {
        // if the current is higher than the firstLargest number
        if (nums[i] > first) {
            // firstLargest becomes second largest as it is no longer largest
            second = first;
            //we have a new largest number so assign it
            first = nums[i];
        }
        // if the current number is bigger than SecondHighest but lower than the largest
        if (nums[i] > second && nums[i] < first) {
            // we have a new SecondLargest 
            second = nums[i];
        }
    }
    // return it
    return second;
}
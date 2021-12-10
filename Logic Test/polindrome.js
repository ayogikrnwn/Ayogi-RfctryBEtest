#include <iostream>
using namespace std;
 

bool isPalindrome(string str1, str2, str3, str4)
{
    int low = 0;
    int high = str.length() - 1;
 
    while (low < high)
    {
        
        if (str[low] != str[high])
            return false;
 
        low++;
        high--;
    }
 
    return true;
}
 
int main()
{
    string str1 = "Radar";
    string str2 = "Malam";
    string str3 = "Kasur ini rusak";
    string str4 = "Ibu Ratna antar ubi";  
 
    if (isPalindrome(str1))
        cout << "Palindrome";
    else
        cout << "Not Palindrome";
 
    return 0;
}

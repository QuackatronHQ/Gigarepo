// Importing standard library classes individually
import java.util.ArrayList;
import java.util.List;

// Importing all classes from a standard library package
import java.util.*;

// Importing a specific class from a standard library package
import java.util.Scanner;

public class ImportExample {
    public static void main(String[] args) {
        // Using classes from the imported packages
        
        // Using ArrayList from java.util
        List<String> list = new ArrayList<>();
        list.add("Hello");
        list.add("World");
        System.out.println(list);
        
        // Using Scanner from java.util
        Scanner scanner = new Scanner(System.in);
        System.out.print("Enter your name: ");
        String name = scanner.nextLine();
        System.out.println("Hello, " + name);
        
        // Using Math class from java.lang (does not require import statement)
        double squareRoot = Math.sqrt(16);
        System.out.println("Square root of 16: " + squareRoot);
        
        // Using Date class from java.util (imported using wildcard import)
        Date currentDate = new Date();
        System.out.println("Current date: " + currentDate);
    }
}

package com.example.challenge2;

import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;

import java.util.List;
import java.util.Map;
import java.util.Scanner;

public class Challenge2Application {

    public static void main(String[] args) {

        System.out.println("Please enter a sentence: ");
        String[] sentences = readLine();

        ApplicationContext context = new AnnotationConfigApplicationContext(CountingSingleton.class);
        CountingSingleton counting = context.getBean(CountingSingleton.class);

//        ApplicationContext context = new AnnotationConfigApplicationContext(CountingPrototype.class);
//        CountingPrototype counting = context.getBean(CountingPrototype.class);

        List<Map<String, Integer>> list = counting.countWords(sentences);
        for (int i = 0 ; i < list.size(); i++)
        {
            System.out.println(sentences[i] + ": ");
            System.out.println(list.get(i));
        }
    }

    public static String[] readLine()
    {
        Scanner scanner = new Scanner(System.in);
        return scanner.nextLine().split("[.?!]");
    }
}

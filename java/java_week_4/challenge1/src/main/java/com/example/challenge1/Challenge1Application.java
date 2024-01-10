package com.example.challenge1;

import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;

public class Challenge1Application {

    public static void main(String[] args)
    {
        ApplicationContext context = new AnnotationConfigApplicationContext(GreetingsService.class);
        GreetingsService greeting = context.getBean(GreetingsService.class);
        System.out.println(greeting.getMessage());
    }
}

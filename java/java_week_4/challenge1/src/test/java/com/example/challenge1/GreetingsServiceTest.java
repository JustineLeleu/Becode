package com.example.challenge1;

import org.junit.jupiter.api.Test;
import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;

import static org.junit.jupiter.api.Assertions.*;

class GreetingsServiceTest {

    @Test
    void FRMessage(){
        ApplicationContext context = new AnnotationConfigApplicationContext(GreetingsService.class);
        GreetingsService greeting = context.getBean(GreetingsService.class);
        greeting.setRequest("FR");
        assertEquals("Bonjour le monde avec spring!", greeting.getMessage());
    }

    @Test
    void NLMessage(){
        ApplicationContext context = new AnnotationConfigApplicationContext(GreetingsService.class);
        GreetingsService greeting = context.getBean(GreetingsService.class);
        greeting.setRequest("NL");
        assertEquals("Hallo wereld met spring!", greeting.getMessage());
    }

    @Test
    void GERMessage(){
        ApplicationContext context = new AnnotationConfigApplicationContext(GreetingsService.class);
        GreetingsService greeting = context.getBean(GreetingsService.class);
        greeting.setRequest("GER");
        assertEquals("Hallo Welt mit Schpring!", greeting.getMessage());
    }

    @Test
    void NativeMessage(){
        ApplicationContext context = new AnnotationConfigApplicationContext(GreetingsService.class);
        GreetingsService greeting = context.getBean(GreetingsService.class);
        greeting.setRequest("native");
        assertEquals("hello world in spring!", greeting.getMessage());
    }

}
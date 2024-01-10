package com.example.challenge3;


public class HelloCommand implements Command {
    @Override
    public void execute() {
        System.out.println("Hello world!");
    }
}

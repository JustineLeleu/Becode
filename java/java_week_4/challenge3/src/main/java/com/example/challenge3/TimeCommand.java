package com.example.challenge3;


public class TimeCommand implements Command{
    @Override
    public void execute() {
        System.out.println("Current time is: " + java.time.LocalTime.now());
    }
}

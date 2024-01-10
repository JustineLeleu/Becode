package org.example;

import java.util.Scanner;

public class Main
{
    public static void main(String[] args)
    {
        askCommand();
    }

    // method called to ask user for command
    public static void askCommand()
    {
        Scanner myObj = new Scanner(System.in);
        System.out.println("Enter command");

        String input = myObj.nextLine();

        findCommand(input);
    }

    // method called to find the command in enum and call launch function
    public static void findCommand(String input)
    {
        String[] commands = input.split("\\s+(?=-)");
        String command = commands[0];
        String[] params = null;

        if (commands.length > 1)
        {
            params = new String[commands.length - 1];
            System.arraycopy(commands, 1, params, 0, commands.length - 1);
        }

        try
        {
            Commands.valueOf(command.toUpperCase()).commandClass.launchCommand(params);
        }
        catch (IllegalArgumentException e)
        {
            System.out.println(command + " is not a valid command");
        }

        askCommand();
    }
}
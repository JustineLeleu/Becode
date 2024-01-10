package org.example;

import java.util.*;

// Parent class for a general command
public abstract class CommandHandler
{
    final int maxParams;    // Number max of parameters allowed for the command

    CommandHandler(int maxParams)
    {
        this.maxParams = maxParams;
    }

    // Method to call when command is given. Need to be implemented in every child class
    public abstract void launchCommand(String[] params);

    // Method to make a first simple check of the parameters
    protected boolean checkParams(String[] params)
    {
        return params != null && params.length <= this.maxParams;
    }

    // Method that check if one of the given parameter correspond to the given values
    protected boolean checkIfParam(String[] params, String name)
    {
        for (String param : params)
        {
            if (param.split(":").length != 2) return false;
            if (Objects.equals(param.split(":")[0], name)) return true;
        }
        return false;
    }

    // Filter the parameters to check if they are valid and not repeated + add default params
    public Map<String, String> filterParams(String[] params, Map<String, String> validParams, Map<String, String> defaultParams)
    {
        Map<String, String> map = new HashMap<>();

        if (params != null)
        {
            for (String param : params)
            {
                String paramName = param.split(":")[0];
                String paramValue = param.split(":")[1];
                if (validParams.containsKey(paramName) && !map.containsKey(validParams.get(paramName))) map.put(validParams.get(paramName), paramValue);
                else return null;
            }
        }

        for (String param : defaultParams.keySet())
        {
            if (!map.containsKey(param)) map.put(param, defaultParams.get(param));
        }

        return map;
    }

    // Methode to call in case of error in the parameters
    public void paramError()
    {
        System.out.println("Error in parameters");
    }

    // Method to get a list of the CSV lines corresponding to the parameters
    public List<FileLine> getFileLines(Map<String, String> givenParams)
    {
        FileReader fileReader = new FileReader();
        return fileReader
                .getFilteredLines
                        (givenParams.getOrDefault("direction", null),
                            givenParams.getOrDefault("year", null),
                            givenParams.getOrDefault("month", null),
                            givenParams.getOrDefault("date", null),
                            givenParams.getOrDefault("weekday", null),
                            givenParams.getOrDefault("country", null),
                            givenParams.getOrDefault("commodity", null),
                            givenParams.getOrDefault("transport", null),
                            givenParams.getOrDefault("measure", null),
                            givenParams.getOrDefault("value", null),
                            givenParams.getOrDefault("cumulative", null));
    }
}

// class handling help command
class HelpHandler extends CommandHandler
{
    final Map<String, String> infos;    // infos about the others commands with the command name as the key
    HelpHandler(int maxParams, Map<String, String> infos)
    {
        super(maxParams);
        this.infos = infos;
    }

    @Override
    public void launchCommand(String[] params)
    {
        // Check if there is parameters to choose what method to call next
        if (checkParams(params)) displayHelpWithParam(params[0]);
        else displayHelp();
    }

    // Display all the possible help commands
    public void displayHelp()
    {
        System.out.println("Help commands: ");
        for (String key : this.infos.keySet())
        {
            System.out.println("help " + key);
        }
    }

    // Display the infos about the command specified in the parameters
    public void displayHelpWithParam(String param)
    {
        System.out.println("help " + param + ":");
        if (infos.containsKey(param)) System.out.println(infos.get(param));
        else
        {
            System.out.println(param + " not a valid command");
            displayHelp();
        }
    }
}

// class handling csv lines displaying command
class fileDisplayCommand extends CommandHandler
{
    final String[] neededParams;                        // parameters needed for this command
    final Map<String, String> validParams;              // parameters valid for this command
    final Map<String, String> defaultParams;            // default parameters for this command
    final boolean isTotal;                              // check if command must return total
    final boolean isAverage;                            // check if command must return average

    fileDisplayCommand(int maxParams, String[] neededParams, Map<String, String> validParams, Map<String, String> defaultParams, boolean isTotal, boolean isAverage)
    {
        super(maxParams);
        this.neededParams = neededParams;
        this.validParams = validParams;
        this.defaultParams = defaultParams;
        this.isTotal = isTotal;
        this.isAverage = isAverage;
    }

    @Override
    public void launchCommand(String[] params)
    {
        // First check for valid parameters
        if (!checkParams(params))
        {
            paramError();
            return;
        }

        // Filter parameters and second check
        Map<String, String> givenParams = filterParams(params, validParams, defaultParams);

        // Get the CSV lines corresponding to the parameters and call the corresponding display function
        List<FileLine> lines = getFileLines(givenParams);
        if (isTotal) displayTotal(lines);
        else if (isAverage) displayAverage(lines);
        else displayLines(lines);
    }

    @Override
    protected boolean checkParams(String[] params)
    {
        /*
        Basic check of parameters
        check if needed params present and check if correct values
         */

        if (neededParams == null) return params == null || params.length <= this.maxParams;
        else if (params.length <= this.maxParams && params.length >= neededParams.length)
        {
            for (String param : neededParams)
            {
                if (!checkIfParam(params, param)) return false;
            }
            return true;
        }

        return false;
    }

    // called to display total values of lines corresponding to the command
    protected void displayTotal(List<FileLine> lines)
    {
        long result = 0;
        for (FileLine line: lines)
        {
            result += line.getValue();
        }

        System.out.println("The sum equals : " + result);
    }

    // called to display average values of lines corresponding to the command
    protected void displayAverage(List<FileLine> lines)
    {
        long result = 0;
        for (FileLine line: lines)
        {
            result += line.getValue();
        }
        result = result / lines.size();
        System.out.println("The average equals : " + result);
    }

    // called to display all lines corresponding to the command
    protected void displayLines(List<FileLine> lines)
    {
        for (FileLine line: lines)
        {
            line.displayLine();
        }
    }
}

// class handling quit command
class QuitHandler extends CommandHandler
{
    QuitHandler(int maxParams)
    {
        super(maxParams);
    }

    @Override
    public void launchCommand(String[] params)
    {
        System.exit(0);
    }
}
package org.example;

import java.util.HashMap;
import java.util.Map;

// Enum grouping all commands and calling the corresponding class
// Add the description to the getInfos method when adding command
public enum Commands
{
    HELP(new HelpHandler(1, getInfos())),
    MONTHLY_TOTAL(new fileDisplayCommand(6,
            new String[]{"-month", "-year"},
            new HashMap<>() {{
                put("-month", "month");
                put("-year", "year");
                put("-cou", "country");
                put("-com", "commodity");
                put("t", "transport");
                put("m", "measure");
            }},
            new HashMap<>() {{
                put("country", "All");
                put("commodity", "All");
                put("transport", "All");
                put("measure", "$");
            }},
            true, false)),
    MONTHLY_AVERAGE(new fileDisplayCommand(6,
            new String[]{"-month", "-year"},
            new HashMap<>() {{
                put("-month", "month");
                put("-year", "year");
                put("-cou", "country");
                put("-com", "commodity");
                put("t", "transport");
                put("m", "measure");
            }},
            new HashMap<>() {{
                put("country", "All");
                put("commodity", "All");
                put("transport", "All");
                put("measure", "$");
            }},
            false, true)),
    YEARLY_TOTAL(new fileDisplayCommand(6,
            new String[]{"-year"},
            new HashMap<>() {{
                put("-year", "year");
                put("-cou", "country");
                put("-com", "commodity");
                put("t", "transport");
                put("m", "measure");
            }},
            new HashMap<>() {{
                put("country", "All");
                put("commodity", "All");
                put("transport", "All");
                put("measure", "$");
            }},
            true, false)),
    YEARLY_AVERAGE(new fileDisplayCommand(6,
            new String[]{"-year"},
            new HashMap<>() {{
                put("-year", "year");
                put("-cou", "country");
                put("-com", "commodity");
                put("t", "transport");
                put("m", "measure");
            }},
            new HashMap<>() {{
                put("country", "All");
                put("commodity", "All");
                put("transport", "All");
                put("measure", "$");
            }},
            false, true)),
    OVERVIEW(new fileDisplayCommand(6,
            null,
            new HashMap<>() {{
                put("-cou", "country");
                put("-com", "commodity");
                put("t", "transport");
                put("m", "measure");
            }},
            new HashMap<>() {{
                put("country", "All");
                put("commodity", "All");
                put("transport", "All");
                put("measure", "$");
            }},
            false, false)),
    QUIT(new QuitHandler(0));

    final CommandHandler commandClass;

    Commands(CommandHandler commandClass)
    {
        this.commandClass = commandClass;
    }

    static Map<String, String> getInfos()
    {
        return new HashMap<>() {{
            put("-help", "Returns a list of available commands with a brief description.");
            put("-monthly_total", "Returns the sum of both the export and import for a specified month of a specified year.");
            put("-monthly_average", "Returns the average of both the export and import of a specified month of a specified year.");
            put("-yearly_total", "Provides an overview of all the monthly totals for a particular year. This command returns the total of each month for both import and export and then gives the yearly total for both import and export");
            put("-yearly_average", "Provides an overview of all the monthly averages for a particular year, for both import and export. Then it gives the yearly average for both import and export.");
            put("-overview", "Returns all the unique values that span the data set: years, countries, commodities, transportation modes, and measures.");
            put("-quit", "Stop the program.");
        }};
    }
}

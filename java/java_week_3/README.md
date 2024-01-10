# java_week_3

## The Mission

The goal of this challenge is to introduce you to the concepts of Object-Oriented Programming (OOP), unit testing, and build tools in the context of Java. You will be building a data analysis command-line tool that processes a CSV file containing information about how Covid-19 has affected trade as of July 2021. The program should accept commands as inputs and process them immediately, handling only one command at a time. The commands can also receive parameters, which can either be immediately passed with the command or prompted from the user after the command is entered. Here is the list of mandatory commands your program should recognize:

- `help`: Returns a list of available commands with a brief description.
- `help <command>`: Provides a full explanation of what the "<command>" does and the parameters it requires.
- `monthly_total`: Returns the sum of both the export and import for a specified month of a specified year.
- `monthly_average`: Returns the average of both the export and import of a specified month of a specified year.
- `yearly_total`: Provides an overview of all the monthly totals for a particular year. This command returns the total of each month for both import and export and then gives the yearly total for both import and export.
- `yearly_average`: Provides an overview of all the monthly averages for a particular year, for both import and export. Then it gives the yearly average for both import and export.
- `overview`: Returns all the unique values that span the data set: years, countries, commodities, transportation modes, and measures.

The commands `monthly_total`, `monthly_average`, `yearly_total`, and `yearly_average` have the following parameters available to customize their query:

- `country` (default: "all")
- `commodity` (default: "all")
- `transport_mode` (default: "all")
- `measure` (default: "$")

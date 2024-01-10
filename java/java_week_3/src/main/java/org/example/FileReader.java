package org.example;

import java.io.*;
import java.util.*;

public class FileReader
{
    public List<FileLine> getFilteredLines(String direction, String year, String month, String date, String weekday, String country, String commodity, String transport, String measure, String value, String cumulative)
    {
        List<FileLine> list;
        try(InputStream inputFS = new FileInputStream("src/main/java/org/example/effects-of-covid19-on-trade.csv"); BufferedReader br = new BufferedReader(new InputStreamReader(inputFS)))
        {
            list = br.lines()
                    .skip(1)
                    .map(FileLine::new)
                    .filter(line -> direction == null || Objects.equals(line.getColumns()[0], direction))
                    .filter(line -> year == null || Objects.equals(line.getColumns()[1], year))
                    .filter(line -> month == null || Objects.equals(line.getColumns()[2].split("/")[1], month))
                    .filter(line -> date == null || Objects.equals(line.getColumns()[2], date))
                    .filter(line -> weekday == null || Objects.equals(line.getColumns()[3], weekday))
                    .filter(line -> country == null || Objects.equals(line.getColumns()[4], country))
                    .filter(line -> commodity == null || Objects.equals(line.getColumns()[5], commodity))
                    .filter(line -> transport == null || Objects.equals(line.getColumns()[6], transport))
                    .filter(line -> measure == null || Objects.equals(line.getColumns()[7], measure))
                    .filter(line -> value == null || Objects.equals(line.getColumns()[8], value))
                    .filter(line -> cumulative == null || Objects.equals(line.getColumns()[9], cumulative))
                    .toList();
        }
        catch (IOException e)
        {
            throw new RuntimeException(e);
        }

        return list;
    }
}
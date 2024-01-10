package org.example;

public class FileLine
{
    final String line;
    final String[] columns;
    FileLine(String line)
    {
        this.line = line;
        columns = line.split(",(?!\\s)");
    }

    public String[] getColumns()
    {
        return this.columns;
    }

    public long getValue()
    {
        return Long.parseLong(this.columns[8]);
    }

    public void displayLine()
    {
        System.out.println(this.line);
    }
}

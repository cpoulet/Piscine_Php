#!/usr/local/bin/ruby -w
# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    elm.rb                                             :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: cpoulet <marvin@42.fr>                     +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2016/12/06 14:18:59 by cpoulet           #+#    #+#              #
#    Updated: 2016/12/06 17:11:19 by cpoulet          ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

def my_elem(array)

	str = "		<td>
					<p class=\"poids\">#{array[4].to_f.round(3)}</p>
					<h2 class=\"symbol\">#{array[3]}</h2>
					<p class=\"num\">#{array[2]}</p>
		</td>"
	return (str)
end

def my_blank

    str = "		<td class=\"nope\">
		</td>"
	return (str)
end

def	my_head

	str = "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <title>Mendeleiev</title>
  <style>
    table   {border-spacing:2px;}
    td      {border:1px solid black; padding:1px; width:100px}
    .nope   {border:1px; padding:5px; width:200px}
    .violet {background-color:violet}
    .yellow {background-color:yellow}
    .orange {background-color:orange}
    .green  {background-color:green}
    .blue   {background-color:blue}
    .poids  {text-align:right}
    .symbol {text-align:center}
    .num    {text-align:left}
  </style>  
</head>
<body>
	<table contenteditable=\"true\">"
	return (str)
end

def my_end

	str = "	</table>
</body>
</html>"
	return (str)

end

def my_read

	data = File.open("periodic_table.txt", "r").read.split("\n")
	data.each do |str|
		str.gsub!("=", ",")
		str.gsub!(" position:", "")
		str.gsub!(" number:", "")
		str.gsub!(" small: ", "")
		str.gsub!(" molar:", "")
		str.gsub!(" electron:", "")
	end
	data.collect! {|str| str.split(",")}
	
	k = 0

	str_html = my_head
	7.times do
		str_html += "		<tr>"
		18.times do |i|
			if	data[k][1].to_i == i
				str_html += my_elem(data[k])
				k += 1
			else
				str_html += my_blank()
			end
		end
		str_html += "		</tr>"
	end
	str_html += my_end
	
	return (str_html)
end

def my_html

	File.open("mendeleiev.html", "w") do |str|
		str.puts my_read
	end

end

my_html()

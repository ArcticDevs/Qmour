filedata = None
with open('C:\\Users\yug\insta.txt', 'r') as file :
  filedata = file.read()

print(filedata)
# Replace the target string
filedata = filedata.replace('https://www.instagram.com/', '')

print(filedata)
# Write the file out again
with open('C:\\Users\yug\output.txt', 'w') as file:
  file.write(filedata)
  
  
filedata = None
with open('C:\\Users\yug\output.txt', 'r') as file :
  filedata = file.read()

print(filedata)
# Replace the target string
filedata = filedata.replace('/', '')

print(filedata)
# Write the file out again
with open('C:/Users/yug/final.txt', 'w') as file:
  file.write(filedata)
  
  
 
a_file = open("C:/Users/yug/final.txt", "r")

list_of_lists = []
for line in a_file:
  stripped_line = line.strip()
  line_list = stripped_line.split()
  list_of_lists.append(line_list)

a_file.close()
res = str(list_of_lists)
s = res.replace("[", '').replace("]", '').replace("'", '"')
print("["+s+"]")   
with open('C:/Users/yug/final.txt', 'w') as file:
  file.write("["+s+"]")
     
  
#!"C:/Users/Litan/AppData/Local/Programs/Python/Python37/python.exe"

print("Content-Type: text/html")
print()


import requests
r = requests.get("http://example.com/foo/bar")
print(r.status_code)
print(r.headers)
print(r.content)
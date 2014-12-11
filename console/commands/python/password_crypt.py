import sys
from passlib.context import CryptContext

ctx = CryptContext(schemes=["pbkdf2_sha512"])
unescaped = ctx.encrypt(sys.argv[1])

escaped = unescaped.replace('/', '\/')
result = escaped.replace("$", "\$")

print result
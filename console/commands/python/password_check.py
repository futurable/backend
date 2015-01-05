import sys
from passlib.context import CryptContext

ctx = CryptContext(schemes=["pbkdf2_sha512"])
plain = sys.argv[1]
crypted = sys.argv[2]

result = ctx.verify(plain, crypted)

print result

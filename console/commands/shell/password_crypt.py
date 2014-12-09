import sys
from passlib.context import CryptContext

ctx = CryptContext(schemes=["pbkdf2_sha512"])
result = ctx.encrypt(sys.argv[1])

print result
"""Empaqueta el tema alexcuar-pro en alexcuar-pro.zip listo para subir a WordPress."""
import os
import zipfile

BASE = os.path.dirname(os.path.abspath(__file__))
THEME = os.path.join(BASE, "alexcuar-pro")


def package() -> str:
    target = os.path.join(BASE, "alexcuar-pro.zip")
    with zipfile.ZipFile(target, "w", zipfile.ZIP_DEFLATED) as archive:
        for root, _, files in os.walk(THEME):
            for name in files:
                path = os.path.join(root, name)
                archive.write(path, os.path.relpath(path, BASE).replace(os.sep, "/"))
    return target


if __name__ == "__main__":
    zip_path = package()
    print(zip_path, os.path.getsize(zip_path))

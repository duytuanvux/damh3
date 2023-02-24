import pandas as pd
import numpy as np
import re
header_list = ["pmid", "pmcid", "created", "length", "position", "accessions", "year", "authors", "title", "text","type", "id"]
df = pd.read_excel('data1.json', engine='openpyxl')
df_check = df.isna()
df1 = df[df.isna().any(axis=1)]
print(df1)
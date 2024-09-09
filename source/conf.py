# Configuration file for the Sphinx documentation builder.
#
# For the full list of built-in configuration values, see the documentation:
# https://www.sphinx-doc.org/en/master/usage/configuration.html

# -- Project information -----------------------------------------------------
# https://www.sphinx-doc.org/en/master/usage/configuration.html#project-information

project = 'chemieinformatics-edu'
copyright = '2024, ziheng zhao'
author = 'ziheng zhao'
release = '1.0'

# -- General configuration ---------------------------------------------------
# https://www.sphinx-doc.org/en/master/usage/configuration.html#general-configuration

# Extensions
extensions = [
    'sphinx.ext.autodoc',      # 自动生成文档（如果需要）
    'sphinx.ext.napoleon',     # 支持 Google 和 NumPy 风格 docstring
    'sphinx.ext.viewcode',     # 查看代码链接
]

templates_path = ['_templates']
exclude_patterns = []

# 设置主文档文件为 index.rst
master_doc = 'index'

# -- Options for HTML output -------------------------------------------------
# https://www.sphinx-doc.org/en/master/usage/configuration.html#options-for-html-output

html_theme = 'sphinx_rtd_theme'  # Read the Docs 主题
# html_static_path = ['_static']

# -- Napoleon settings (for Google/NumPy style docstrings) -------------------
napoleon_google_docstring = True
napoleon_numpy_docstring = True

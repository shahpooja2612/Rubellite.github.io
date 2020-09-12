<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body>
<h2>Student Database</h2>
<table border="1">
<tr bgcolor="blue">
<th>Name</th>
<th>Address</th>
<th>Std</th>

</tr>
<xsl:for-each select="Student/Person-Details">
<xsl:sort select="std"/>
<tr bgcolor="Aliceblue">
<td><xsl:value-of select="name"/></td>
<td><xsl:value-of select="address"/></td>
<td><xsl:value-of select="std"/></td>

</tr>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
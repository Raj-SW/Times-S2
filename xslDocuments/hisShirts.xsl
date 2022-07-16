<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
  <div class='product'>
    <xsl:for-each select="//item">
    <img>
        <xsl:attribute name="src">
            <xsl:value-of select="itemPath"/>
        </xsl:attribute>
    </img>
      <p><xsl:value-of select="itemName"/></p>   
      <p><xsl:value-of select="itemPrice"/></p> 
      <form action='individualItemPage.php' method='POST'>   
       <input type='hidden' name='productId'>
        <xsl:attribute name="value">
            <xsl:value-of select="itemId"/>
        </xsl:attribute>
        </input>
       
       <div class='view-item'>
              <input type='submit'  class='view-item' name='queryProduct' value='Add To Cart'/>
      </div>

      </form>
    </xsl:for-each>
  </div>
  </xsl:template>
</xsl:stylesheet>